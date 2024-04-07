<?php
namespace App\Controllers;
use App\Services\MovieService;
use App\Models\User;

class HomeController extends Controller
{
    private $movieService;

    public function __construct()
    {
        parent::__construct();
        $this->movieService = new MovieService();
    }

    public function index()
    {
        $model = $this->movieService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }
}
