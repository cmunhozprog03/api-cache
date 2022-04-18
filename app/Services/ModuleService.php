<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{

    protected $moduleRepository, $courseRepoditory;

    public function __construct(
        ModuleRepository $moduleRepository,
        CourseRepository $courseRepositoru
        )
    {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepoditory = $courseRepositoru;
    }

    public function getModulesByCourse(string $course)
    {
        $course = $this->courseRepoditory->getCourseByUuid($course);
        return $this->moduleRepository->getModuleCourse($course->id);
    }

    public function createNewModule(array $data)
    {
        
        return $this->moduleRepository->createNewModule($data);
    }

    public function getModuleByCourse(string $course, string $identify)
    {
        $course = $this->courseRepoditory->getCourseByUuid($course);
        return $this->moduleRepository->getModuleByCourse($course->id, $identify);
    }


    public function updateModule(string $identify, array $data)
    {
        return $this->repository->updateModuleByUuid($identify, $data);
    }

    public function deleteModule(string $identify)
    {
        return $this->repository->deleteModuleByUuid($identify);
    }
}
