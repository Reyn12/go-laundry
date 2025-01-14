<?php
namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserUlasanController extends Controller
{
    public function index()
{
    return response()->json(['message' => 'Welcome to UserUlasanController!']);
}

    // Dummy data for reviews
    private $reviews = [
        [
            'id' => 1,
            'title' => 'Laundry',
            'author' => 'jjdhwoighiwe',
            'date' => '2025-04-22T11:25:00Z',
            'rating' => 5,
            'content' => 'Lorem ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.',
            'location' => 'Padjajaran, Bandung',
        ],
        [
            'id' => 2,
            'title' => 'Laundry',
            'author' => 'johndoe',
            'date' => '2025-04-21T10:00:00Z',
            'rating' => 4,
            'content' => 'Lorem ipsum dolor sit amet.',
            'location' => 'Jakarta',
        ],
        // Add more dummy data as needed
    ];

    // Method to get filtered reviews
    public function getReviews(Request $request)
    {
        $location = $request->query('location');
        $date = $request->query('date');
        $query = $request->query('query');

        $filteredReviews = $this->reviews;

        // Filter by location
        if ($location) {
            $filteredReviews = array_filter($filteredReviews, function ($review) use ($location) {
                return strtolower($review['location']) === strtolower($location);
            });
        }

        // Filter by date
        if ($date) {
            $filteredReviews = array_filter($filteredReviews, function ($review) use ($date) {
                return substr($review['date'], 0, 10) === $date;
            });
        }

        // Filter by query (title or content)
        if ($query) {
            $filteredReviews = array_filter($filteredReviews, function ($review) use ($query) {
                return stripos($review['title'], $query) !== false ||
                       stripos($review['content'], $query) !== false;
            });
        }

        return response()->json(array_values($filteredReviews));
    }
}
