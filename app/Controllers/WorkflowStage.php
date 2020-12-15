<?php


namespace App\Controllers;


use App\Models\WorkflowStageModel;

class WorkflowStage extends BaseController
{
    public function index()
    {
        $workflowStageModel = new WorkflowStageModel();
        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('workflow_stage_id');
            // sửa
            $data_update = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'stage_number' => $this->request->getVar('stage_number'),
                'stages_are_allowed' => $this->request->getVar('stages_are_allowed'),
                'date_entered' => $this->request->getVar('date_entered'),
                'created_by' => session()->get('id')
            ];

            $workflowStageModel->update($id, $data_update);
            return redirect()->to('/workflowstage');
        }
        $data['value'] = $workflowStageModel->findByAll();
         return view('workflow_stage/index', $data);

    }

    public function create()
    {
        if($this->request->getMethod() == 'post'){
            $model = new WorkflowStageModel();

            $data = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'stage_number' => $this->request->getVar('stage_number'),
                'stages_are_allowed' => $this->request->getVar('stages_are_allowed'),
                'date_entered' => date('Y-m-d H:i'),
                'created_by' => session()->get('id')
            ];

            $model->insert($data);
        }
        return redirect()->to('/workflowstage');
    }



    public function load()
    {
        if($this->request->getMethod() == 'post'){
            $workflowStage = new WorkflowStageModel();
            $id = $this->request->getVar('id');
            $data['value'] = $workflowStage->findById($id);
            return view('workflow_stage/load', $data);
        }
    }

    public function update()
    {
        if($this->request->getMethod() == 'post'){
            $model = new WorkflowStageModel();
            $id = $this->request->getVar('workflow_stage_id');
            $data_update = [
                'name' => $this->request->getVar('name'),
                'alias' => $this->request->getVar('alias'),
                'stage_number' => $this->request->getVar('stage_number'),
                'stages_are_allowed' => $this->request->getVar('stages_are_allowed'),
                'date_entered' => $this->request->getVar('date_entered'),
            ];
            $model->update($id, $data_update);
        }
        return redirect()->to('/workflowstage');

    }

    public function delete($id){
        $model = new WorkflowStageModel();
        $model->where('workflow_stage_id', $id);
        $model->delete();
        return redirect()->to('/workflowstage');
    }
}