<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use App\Models\VideoAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoGalleryController extends Controller
{
    // Display a listing of the video galleries
    public function index()
    {
        $videos = VideoGallery::with('Album')->get();
        return view('admin.videos.index', compact('videos'));
    }

    // Show the form to create a new video
    public function create()
    {
        $albums = VideoAlbum::all();
        return view('admin.videos.create', compact('albums'));
    }

    // Store a new video
    public function store(Request $request)
    {
        $request->validate([
            'video_album_id' => 'required|exists:video_album,id',
            'video_title_en' => 'nullable|string|max:255',
            'video_title_ar' => 'nullable|string|max:255',
            'video_thumbnail' => 'nullable|image|max:2048',
            'youtube_links' => 'required|array',
            'youtube_links.*' => 'required|string|url',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('video_thumbnail')) {
            $thumbnailPath = $request->file('video_thumbnail')->store('video_thumbnails', 'public');
        }

        VideoGallery::create([
            'video_album_id' => $request->video_album_id,
            'video_title_en' => $request->video_title_en,
            'video_title_ar' => $request->video_title_ar,
            'video_thumbnail' => $thumbnailPath,
            'youtube_links' => json_encode($request->youtube_links),
        ]);

        return redirect()->route('admin.videos.index')->with('status-success', 'Video created successfully.');
    }

    // Fetch YouTube video details using the YouTube Data API
    public function fetchDetails(Request $request)
    {
        try {
            $youtubeUrl = $request->query('youtube_url');

            if (!$youtubeUrl) {
                return response()->json(['success' => false, 'message' => 'Missing YouTube URL.']);
            }

            $details = $this->fetchYouTubeDetails($youtubeUrl);

            if (!empty($details['title']) && !empty($details['thumbnail_url'])) {
                return response()->json([
                    'success' => true,
                    'title' => $details['title'],
                    'thumbnail_url' => $details['thumbnail_url'],
                    'description' => $details['description'] ?? '',
                ]);
            }

            return response()->json(['success' => false, 'message' => 'Video not found or invalid URL.']);
        } catch (\Exception $e) {
            \Log::error('Error fetching YouTube details: ' . $e->getMessage(), [
                'exception' => $e,
                'stack' => $e->getTraceAsString(),
            ]);
            return response()->json(['success' => false, 'message' => 'There was an error fetching YouTube details.']);
        }
    }

    // Helper function to fetch YouTube video details
    private function fetchYouTubeDetails($youtubeLink)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $youtubeLink, $matches);

        if (empty($matches[1])) {
            return [];
        }

        $videoId = $matches[1];
        $apiKey = 'AIzaSyD9cg9XXCdUr0AwyPFn9dboFCE5woqXMgU'; // Replace with your actual API key

        $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$videoId&key=$apiKey";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['items'][0])) {
            $snippet = $data['items'][0]['snippet'];
            return [
                'title' => $snippet['title'],
                'thumbnail_url' => $snippet['thumbnails']['high']['url'],
                'description' => $snippet['description'] ?? '',
            ];
        }

        return [];
    }
    // Delete a video
    public function destroy($id)
    {
        $video = VideoGallery::findOrFail($id);

        // Delete the thumbnail from storage if it exists
        if ($video->video_thumbnail && Storage::disk('public')->exists($video->video_thumbnail)) {
            Storage::disk('public')->delete($video->video_thumbnail);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')->with('status-success', 'Video deleted successfully.');
    }
}
