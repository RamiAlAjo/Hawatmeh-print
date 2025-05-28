<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner as bannerModel; // Use the renamed model

class Banner extends Component
{
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @param string $pageTitle
     */
    public function __construct($pageTitle)
    {
        $this->pageTitle = $pageTitle; // Set the pageTitle property
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Retrieve all banners using the renamed model
        $banners = bannerModel::all();

        // Pass the pageTitle and banners to the view
        return view('components.banner', [
            'pageTitle' => $this->pageTitle, // Access the pageTitle property
            'banners' => $banners
        ]);
    }
}
