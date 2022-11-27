<?php
namespace App\Repositories\EventRepository;

interface ProshoreEventRepositoryInterface{

    public function addEventList($request);
    public function getEventList();
    public function editEventList($request);
    public function deleteEventList($request);
    
}