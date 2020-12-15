<?php


namespace App\Models;


use CodeIgniter\Model;

class WorkflowStageModel extends Model
{
    protected $table = 'workflow_stages';
    protected $primaryKey = 'workflow_stage_id';
    protected $allowedFields = ['name', 'alias', 'stage_number', 'stages_are_allowed', 'date_entered', 'create_by'];

    function findByAll()
    {
        $workflowStage = $this->findAll();
        return $workflowStage;
    }

    function findById($id){
        $model = $this->where('workflow_stage_id', $id)->first();
        return $model;
    }
}