<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homework3Controller extends Controller
{
    public function index()
    {
        $q1 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->select('e.first_name', 'e.last_name', 'e.department_id', 'd.department_name')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q1_page');

        $q2 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->select('e.first_name', 'e.last_name', 'd.department_name', 'l.city', 'l.state_province')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q2_page');

        $q3 = DB::table('employees as e')
            ->join('job_grade as jg', function ($join) {
                $join->on('e.salary', '>=', 'jg.lowest_sal')
                     ->on('e.salary', '<=', 'jg.highest_sal');
            })
            ->select('e.first_name', 'e.last_name', 'e.salary', 'jg.grade_level')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q3_page');

        $q4 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->select('e.first_name', 'e.last_name', 'e.department_id', 'd.department_name')
            ->whereIn('e.department_id', [80, 40])
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q4_page');

        $q5 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->select('e.first_name', 'e.last_name', 'd.department_name', 'l.city', 'l.state_province')
            ->where('e.first_name', 'like', '%z%')
            ->orWhere('e.first_name', 'like', '%Z%')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q5_page');

        $q6 = DB::table('departments as d')
            ->leftJoin('employees as e', 'd.department_id', '=', 'e.department_id')
            ->select('e.first_name', 'e.last_name', 'd.department_id', 'd.department_name')
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q6_page');

        $q7 = DB::table('employees as e')
            ->select('e.first_name', 'e.last_name', 'e.salary')
            ->where('e.salary', '<', function ($q) {
                $q->select('salary')->from('employees')->where('employee_id', 182);
            })
            ->orderBy('e.salary')
            ->paginate(10, ['*'], 'q7_page');

        $q8 = DB::table('employees as e')
            ->join('employees as m', 'e.manager_id', '=', 'm.employee_id')
            ->select('e.first_name as employee_name', 'm.first_name as manager_name')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q8_page');

        $q9 = DB::table('departments as d')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->select('d.department_name', 'l.city', 'l.state_province')
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q9_page');

        $q10 = DB::table('employees as e')
            ->leftJoin('departments as d', 'e.department_id', '=', 'd.department_id')
            ->select('e.first_name', 'e.last_name', 'd.department_id', 'd.department_name')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q10_page');

        $q11 = DB::table('employees as e')
            ->leftJoin('employees as m', 'e.manager_id', '=', 'm.employee_id')
            ->select('e.first_name as employee_name', 'm.first_name as manager_name')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q11_page');

        $q12 = DB::table('employees as e')
            ->select('e.first_name', 'e.last_name', 'e.department_id')
            ->whereIn('e.department_id', function ($q) {
                $q->select('department_id')->from('employees')->where('last_name', 'Taylor')->distinct();
            })
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q12_page');

        $q13 = DB::table('job_history as jh')
            ->join('employees as e', 'jh.employee_id', '=', 'e.employee_id')
            ->join('job as j', 'jh.job_id', '=', 'j.job_id')
            ->join('departments as d', 'jh.department_id', '=', 'd.department_id')
            ->select('j.job_title', 'd.department_name',
                     DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"),
                     'jh.start_date')
            ->whereBetween('jh.start_date', ['1993-01-01', '1997-08-31'])
            ->orderBy('jh.start_date')
            ->paginate(10, ['*'], 'q13_page');

        $q14 = DB::table('employees as e')
            ->join('job as j', 'e.job_id', '=', 'j.job_id')
            ->select('j.job_title',
                     DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"),
                     DB::raw('(j.max_salary - e.salary) AS salary_difference'))
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q14_page');

        $q15 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->select('d.department_name',
                     DB::raw('AVG(e.salary) AS average_salary'),
                     DB::raw("COUNT(CASE WHEN e.commission_pct > 0 THEN 1 END) AS emp_with_commission"))
            ->groupBy('d.department_id', 'd.department_name')
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q15_page');

        $q16 = DB::table('employees as e')
            ->join('job as j', 'e.job_id', '=', 'j.job_id')
            ->select(DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"),
                     'j.job_title',
                     DB::raw('(j.max_salary - e.salary) AS salary_difference'))
            ->where('e.department_id', 80)
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q16_page');

        $q17 = DB::table('countries as c')
            ->join('locations as l', 'c.country_id', '=', 'l.country_id')
            ->join('departments as d', 'l.location_id', '=', 'd.location_id')
            ->select('c.country_name', 'l.city', 'd.department_name')
            ->orderBy('c.country_name')
            ->orderBy('l.city')
            ->paginate(10, ['*'], 'q17_page');

        $q18 = DB::table('departments as d')
            ->join('employees as e', 'd.manager_id', '=', 'e.employee_id')
            ->select('d.department_name',
                     DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS manager_name"))
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q18_page');

        $q19 = DB::table('employees as e')
            ->join('job as j', 'e.job_id', '=', 'j.job_id')
            ->select('j.job_title', DB::raw('AVG(e.salary) AS average_salary'))
            ->groupBy('j.job_id', 'j.job_title')
            ->orderBy('j.job_title')
            ->paginate(10, ['*'], 'q19_page');

        $q20 = DB::table('job_history as jh')
            ->join('employees as e', 'jh.employee_id', '=', 'e.employee_id')
            ->join('job as j', 'jh.job_id', '=', 'j.job_id')
            ->select('jh.*', 'j.job_title')
            ->where('e.salary', '>=', 12000)
            ->orderBy('e.employee_id')
            ->orderBy('jh.start_date')
            ->paginate(10, ['*'], 'q20_page');

        $q21 = DB::table('countries as c')
            ->join('locations as l', 'c.country_id', '=', 'l.country_id')
            ->join('departments as d', 'l.location_id', '=', 'd.location_id')
            ->whereIn('d.department_id', function ($q) {
                $q->select('department_id')->from('employees')
                  ->groupBy('department_id')->having(DB::raw('COUNT(*)'), '>=', 2);
            })
            ->select('c.country_name', 'l.city', DB::raw('COUNT(d.department_id) AS department_count'))
            ->groupBy('c.country_id', 'c.country_name', 'l.city')
            ->orderBy('c.country_name')
            ->orderBy('l.city')
            ->paginate(10, ['*'], 'q21_page');

        $q22 = DB::table('departments as d')
            ->join('employees as e', 'd.manager_id', '=', 'e.employee_id')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->select('d.department_name',
                     DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS manager_name"),
                     'l.city')
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q22_page');

        $q23 = DB::table('job_history as jh')
            ->join('job as j', 'jh.job_id', '=', 'j.job_id')
            ->select('jh.employee_id', 'j.job_title',
                     DB::raw('DATEDIFF(jh.end_date, jh.start_date) AS days_worked'))
            ->where('jh.department_id', 80)
            ->orderBy('jh.employee_id')
            ->orderBy('jh.start_date')
            ->paginate(10, ['*'], 'q23_page');

        $q24 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->select(DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"), 'e.salary')
            ->where('l.city', 'London')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q24_page');

        $q25 = DB::table('employees as e')
            ->join('job_history as jh', 'e.employee_id', '=', 'jh.employee_id')
            ->join('job as j', 'jh.job_id', '=', 'j.job_id')
            ->select(DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"),
                     'j.job_title', 'jh.start_date', 'jh.end_date')
            ->where('e.commission_pct', 0)
            ->whereIn('jh.end_date', function ($q) {
                $q->select(DB::raw('MAX(jh2.end_date)'))
                  ->from('job_history as jh2')
                  ->whereColumn('jh2.employee_id', 'e.employee_id');
            })
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q25_page');

        $q26 = DB::table('departments as d')
            ->leftJoin('employees as e', 'd.department_id', '=', 'e.department_id')
            ->select('d.department_name', DB::raw('COUNT(e.employee_id) AS employee_count'))
            ->groupBy('d.department_id', 'd.department_name')
            ->orderBy('d.department_id')
            ->paginate(10, ['*'], 'q26_page');

        $q27 = DB::table('employees as e')
            ->join('departments as d', 'e.department_id', '=', 'd.department_id')
            ->join('locations as l', 'd.location_id', '=', 'l.location_id')
            ->join('countries as c', 'l.country_id', '=', 'c.country_id')
            ->select('e.employee_id',
                     DB::raw("CONCAT(e.first_name, ' ', e.last_name) AS full_name"),
                     'c.country_name')
            ->orderBy('e.employee_id')
            ->paginate(10, ['*'], 'q27_page');

        return view('homework3', compact(
            'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10',
            'q11', 'q12', 'q13', 'q14', 'q15', 'q16', 'q17', 'q18', 'q19', 'q20',
            'q21', 'q22', 'q23', 'q24', 'q25', 'q26', 'q27'
        ));
    }
}
