<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Project;
use App\Model\Staff;

class ProjectCommitteeController extends Controller
{

    /**
      * $projectId
      */
    public function form($projectId)
    {
        $project = Project::findOrFail($projectId);
        $staffs = Staff::all();

        return view('projects.committees.add', [
          'project' => $project,
          'staffs' => $staffs
        ]);
    }

    /**
      * $projectId
      */
    public function all($projectId)
    {
        $project = Project::findOrFail($projectId);

        return $project->committees;
    }

    /**
     * $projectId
     * $committeeId
     */
    public function one($projectId, $committeeId)
    {
        $project = Project::findOrFail($projectId);
        foreach ($project->committees as $committee) {
            if ($committee->cid == $committeeId) {
                return $committee;
            }
        }

        return abort(404);
    }

    /**
     * $projectId
     */
    public function create(Request $request, $projectId)
    {
        $staffId = $request->input('staff_id');
        $type = $request->input('type');

        $success = DB::table('committee')->insert([
            'pid' => $projectId,
            'staff_id' => $staffId,
            'type' => $type
        ]);

        return $success;

    }

    /**
     * $projectId
     * $committeeId
     */
     public function delete($projectId, $committeeId)
     {
         $success = DB::table('committee')
            ->where('pid', $projectId)
            ->where('cid', $committeeId)
            ->delete();

        return $success;
     }

}
