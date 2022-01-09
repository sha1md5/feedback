<?php

namespace App\Http\Controllers;

use App\Models\Repository\AnswerRepository;
use App\Models\Repository\ClientRepository;
use App\Models\Repository\ProjectRepository;

class ReportController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    /**
     * ReportController constructor.
     *
     * @param ProjectRepository $projectRepository
     * @param ClientRepository  $clientRepository
     * @param AnswerRepository  $answerRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ClientRepository $clientRepository,
        AnswerRepository $answerRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->clientRepository = $clientRepository;
        $this->answerRepository = $answerRepository;
    }

    public function dashboard()
    {
        $projectsCount = $this->projectRepository->getProjectsCount();
        $projectsCountByClient = $this->clientRepository->getProjectsCountByClient()->get();

        return view('report.dashboard', [
            'projectsCount'         => $projectsCount,
            'projectsCountByClient' => $projectsCountByClient,
        ]);
    }

    public function range()
    {
        $avgAnswers = $this->answerRepository->getAvgRangeAnswers()->get();
        $avgAnswersByClient = $this->answerRepository->getAvgRangeAnswersByClient()->get();

        return view('report.range', [
            'avgAnswers'         => $avgAnswers,
            'avgAnswersByClient' => $avgAnswersByClient,
        ]);
    }

    public function text()
    {
        $textAnswers = $this->answerRepository->getTextAnswers()->get();

        return view('report.text', [
            'textAnswers' => $textAnswers,
        ]);
    }
}

