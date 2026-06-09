<!DOCTYPE html>
<html>

<head>
    <title>SQL Homework 3 – JOIN Queries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .query {
            background: #fff;
            border-radius: 8px;
            margin: 20px 0;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        .query h2 {
            background: #4a90d9;
            color: #fff;
            margin: -15px -15px 15px;
            padding: 10px 15px;
            border-radius: 8px 8px 0 0;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #e8e8e8;
            text-align: left;
            padding: 8px;
            font-size: 13px;
        }

        td {
            padding: 6px 8px;
            border-bottom: 1px solid #ddd;
            font-size: 13px;
        }

        tr:hover {
            background: #f0f7ff;
        }

        .null {
            color: #999;
            font-style: italic;
        }

        .pagination {
            margin-top: 10px;
        }

        .pagination nav {
            display: inline-block;
        }

        .pagination .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
        }

        .pagination .page-link {
            padding: 4px 10px;
            margin: 0 2px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #4a90d9;
            border-radius: 3px;
            font-size: 13px;
            background: #fff;
        }

        .pagination .page-item.active .page-link {
            background: #4a90d9;
            color: #fff;
            border-color: #4a90d9;
        }

        .pagination .page-link:hover {
            background: #e8f0fe;
        }

        .pagination .page-item.disabled .page-link {
            background: #f5f5f5;
            color: #aaa;
        }

        .info {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="query">
        <h2>1. First name, last name, department number, and department name for each employee</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_id</th>
                <th>department_name</th>
            </tr>
            @foreach($q1 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_id }}</td>
                <td>{{ $r->department_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q1->firstItem() }}-{{ $q1->lastItem() }} of {{ $q1->total() }}</div>
        <div class="pagination">{{ $q1->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>2. First name, last name, department, city, and state province for each employee</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_name</th>
                <th>city</th>
                <th>state_province</th>
            </tr>
            @foreach($q2 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->city }}</td>
                <td>{{ $r->state_province ?? '' }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q2->firstItem() }}-{{ $q2->lastItem() }} of {{ $q2->total() }}</div>
        <div class="pagination">{{ $q2->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>3. First name, last name, salary, and job grade for all employees</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>salary</th>
                <th>grade_level</th>
            </tr>
            @foreach($q3 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ number_format($r->salary, 2) }}</td>
                <td>{{ $r->grade_level }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q3->firstItem() }}-{{ $q3->lastItem() }} of {{ $q3->total() }}</div>
        <div class="pagination">{{ $q3->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>4. First name, last name, department number and name for departments 80 or 40</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_id</th>
                <th>department_name</th>
            </tr>
            @foreach($q4 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_id }}</td>
                <td>{{ $r->department_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q4->firstItem() }}-{{ $q4->lastItem() }} of {{ $q4->total() }}</div>
        <div class="pagination">{{ $q4->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>5. Employees with letter 'z' in first name, with department, city, and state province</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_name</th>
                <th>city</th>
                <th>state_province</th>
            </tr>
            @foreach($q5 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->city }}</td>
                <td>{{ $r->state_province ?? '' }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q5->firstItem() }}-{{ $q5->lastItem() }} of {{ $q5->total() }}</div>
        <div class="pagination">{{ $q5->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>6. All departments including those with no employees</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_id</th>
                <th>department_name</th>
            </tr>
            @foreach($q6 as $r)<tr>
                <td>{{ $r->first_name ?? '&lt;null&gt;' }}</td>
                <td>{{ $r->last_name ?? '&lt;null&gt;' }}</td>
                <td>{{ $r->department_id }}</td>
                <td>{{ $r->department_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q6->firstItem() }}-{{ $q6->lastItem() }} of {{ $q6->total() }}</div>
        <div class="pagination">{{ $q6->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>7. Employees who earn less than employee number 182</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>salary</th>
            </tr>
            @foreach($q7 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ number_format($r->salary, 2) }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q7->firstItem() }}-{{ $q7->lastItem() }} of {{ $q7->total() }}</div>
        <div class="pagination">{{ $q7->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>8. First name of all employees including the first name of their manager</h2>
        <table>
            <tr>
                <th>employee_name</th>
                <th>manager_name</th>
            </tr>
            @foreach($q8 as $r)<tr>
                <td>{{ $r->employee_name }}</td>
                <td>{{ $r->manager_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q8->firstItem() }}-{{ $q8->lastItem() }} of {{ $q8->total() }}</div>
        <div class="pagination">{{ $q8->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>9. Department name, city, and state province for each department</h2>
        <table>
            <tr>
                <th>department_name</th>
                <th>city</th>
                <th>state_province</th>
            </tr>
            @foreach($q9 as $r)<tr>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->city }}</td>
                <td>{{ $r->state_province ?? '' }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q9->firstItem() }}-{{ $q9->lastItem() }} of {{ $q9->total() }}</div>
        <div class="pagination">{{ $q9->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>10. First name, last name, department number and name for all employees (with or without department)</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_id</th>
                <th>department_name</th>
            </tr>
            @foreach($q10 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_id ?? '' }}</td>
                <td>{{ $r->department_name ?? '' }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q10->firstItem() }}-{{ $q10->lastItem() }} of {{ $q10->total() }}</div>
        <div class="pagination">{{ $q10->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>11. First name of all employees and their manager, including those with no manager</h2>
        <table>
            <tr>
                <th>employee_name</th>
                <th>manager_name</th>
            </tr>
            @foreach($q11 as $r)<tr>
                <td>{{ $r->employee_name }}</td>
                <td>{{ $r->manager_name ?? '&lt;null&gt;' }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q11->firstItem() }}-{{ $q11->lastItem() }} of {{ $q11->total() }}</div>
        <div class="pagination">{{ $q11->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>12. Employees working in the same department as the employee with last name 'Taylor'</h2>
        <table>
            <tr>
                <th>first_name</th>
                <th>last_name</th>
                <th>department_id</th>
            </tr>
            @foreach($q12 as $r)<tr>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->last_name }}</td>
                <td>{{ $r->department_id }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q12->firstItem() }}-{{ $q12->lastItem() }} of {{ $q12->total() }}</div>
        <div class="pagination">{{ $q12->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>13. Job title, department name, full name, and starting date for jobs between Jan 1 1993 and Aug 31 1997</h2>
        <table>
            <tr>
                <th>job_title</th>
                <th>department_name</th>
                <th>full_name</th>
                <th>start_date</th>
            </tr>
            @foreach($q13 as $r)<tr>
                <td>{{ $r->job_title }}</td>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->full_name }}</td>
                <td>{{ $r->start_date }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q13->firstItem() }}-{{ $q13->lastItem() }} of {{ $q13->total() }}</div>
        <div class="pagination">{{ $q13->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>14. Job title, full name, and difference between max salary and employee salary</h2>
        <table>
            <tr>
                <th>job_title</th>
                <th>full_name</th>
                <th>salary_difference</th>
            </tr>
            @foreach($q14 as $r)<tr>
                <td>{{ $r->job_title }}</td>
                <td>{{ $r->full_name }}</td>
                <td>{{ $r->salary_difference }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q14->firstItem() }}-{{ $q14->lastItem() }} of {{ $q14->total() }}</div>
        <div class="pagination">{{ $q14->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>15. Department name, average salary, and number of employees with commission</h2>
        <table>
            <tr>
                <th>department_name</th>
                <th>average_salary</th>
                <th>emp_with_commission</th>
            </tr>
            @foreach($q15 as $r)<tr>
                <td>{{ $r->department_name }}</td>
                <td>{{ number_format($r->average_salary, 2) }}</td>
                <td>{{ $r->emp_with_commission }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q15->firstItem() }}-{{ $q15->lastItem() }} of {{ $q15->total() }}</div>
        <div class="pagination">{{ $q15->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>16. Full name, job title, and salary difference from job max for employees in department 80</h2>
        <table>
            <tr>
                <th>full_name</th>
                <th>job_title</th>
                <th>salary_difference</th>
            </tr>
            @foreach($q16 as $r)<tr>
                <td>{{ $r->full_name }}</td>
                <td>{{ $r->job_title }}</td>
                <td>{{ $r->salary_difference }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q16->firstItem() }}-{{ $q16->lastItem() }} of {{ $q16->total() }}</div>
        <div class="pagination">{{ $q16->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>17. Country name, city, and departments running there</h2>
        <table>
            <tr>
                <th>country_name</th>
                <th>city</th>
                <th>department_name</th>
            </tr>
            @foreach($q17 as $r)<tr>
                <td>{{ $r->country_name }}</td>
                <td>{{ $r->city }}</td>
                <td>{{ $r->department_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q17->firstItem() }}-{{ $q17->lastItem() }} of {{ $q17->total() }}</div>
        <div class="pagination">{{ $q17->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>18. Department name and full name of the manager</h2>
        <table>
            <tr>
                <th>department_name</th>
                <th>manager_name</th>
            </tr>
            @foreach($q18 as $r)<tr>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->manager_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q18->firstItem() }}-{{ $q18->lastItem() }} of {{ $q18->total() }}</div>
        <div class="pagination">{{ $q18->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>19. Job title and average salary of employees</h2>
        <table>
            <tr>
                <th>job_title</th>
                <th>average_salary</th>
            </tr>
            @foreach($q19 as $r)<tr>
                <td>{{ $r->job_title }}</td>
                <td>{{ number_format($r->average_salary, 2) }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q19->firstItem() }}-{{ $q19->lastItem() }} of {{ $q19->total() }}</div>
        <div class="pagination">{{ $q19->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>20. Details of jobs done by employees currently earning 12000 or above</h2>
        <table>
            <tr>
                <th>employee_id</th>
                <th>start_date</th>
                <th>end_date</th>
                <th>job_id</th>
                <th>department_id</th>
                <th>job_title</th>
            </tr>
            @foreach($q20 as $r)<tr>
                <td>{{ $r->employee_id }}</td>
                <td>{{ $r->start_date }}</td>
                <td>{{ $r->end_date }}</td>
                <td>{{ $r->job_id }}</td>
                <td>{{ $r->department_id }}</td>
                <td>{{ $r->job_title }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q20->firstItem() }}-{{ $q20->lastItem() }} of {{ $q20->total() }}</div>
        <div class="pagination">{{ $q20->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>21. Country name, city, and number of departments with at least 2 employees</h2>
        <table>
            <tr>
                <th>country_name</th>
                <th>city</th>
                <th>department_count</th>
            </tr>
            @foreach($q21 as $r)<tr>
                <td>{{ $r->country_name }}</td>
                <td>{{ $r->city }}</td>
                <td>{{ $r->department_count }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q21->firstItem() }}-{{ $q21->lastItem() }} of {{ $q21->total() }}</div>
        <div class="pagination">{{ $q21->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>22. Department name, full name of manager, and their city</h2>
        <table>
            <tr>
                <th>department_name</th>
                <th>manager_name</th>
                <th>city</th>
            </tr>
            @foreach($q22 as $r)<tr>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->manager_name }}</td>
                <td>{{ $r->city }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q22->firstItem() }}-{{ $q22->lastItem() }} of {{ $q22->total() }}</div>
        <div class="pagination">{{ $q22->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>23. Employee ID, job name, and number of days worked for all jobs in department 80</h2>
        <table>
            <tr>
                <th>employee_id</th>
                <th>job_title</th>
                <th>days_worked</th>
            </tr>
            @foreach($q23 as $r)<tr>
                <td>{{ $r->employee_id }}</td>
                <td>{{ $r->job_title }}</td>
                <td>{{ $r->days_worked }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q23->firstItem() }}-{{ $q23->lastItem() }} of {{ $q23->total() }}</div>
        <div class="pagination">{{ $q23->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>24. Full name and salary of employees working in any department located in London</h2>
        <table>
            <tr>
                <th>full_name</th>
                <th>salary</th>
            </tr>
            @foreach($q24 as $r)<tr>
                <td>{{ $r->full_name }}</td>
                <td>{{ number_format($r->salary, 2) }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q24->firstItem() }}-{{ $q24->lastItem() }} of {{ $q24->total() }}</div>
        <div class="pagination">{{ $q24->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>25. Full name, job title, starting and ending date of last job for employees without commission</h2>
        <table>
            <tr>
                <th>full_name</th>
                <th>job_title</th>
                <th>start_date</th>
                <th>end_date</th>
            </tr>
            @foreach($q25 as $r)<tr>
                <td>{{ $r->full_name }}</td>
                <td>{{ $r->job_title }}</td>
                <td>{{ $r->start_date }}</td>
                <td>{{ $r->end_date }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q25->firstItem() }}-{{ $q25->lastItem() }} of {{ $q25->total() }}</div>
        <div class="pagination">{{ $q25->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>26. Department name and number of employees in each department</h2>
        <table>
            <tr>
                <th>department_name</th>
                <th>employee_count</th>
            </tr>
            @foreach($q26 as $r)<tr>
                <td>{{ $r->department_name }}</td>
                <td>{{ $r->employee_count }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q26->firstItem() }}-{{ $q26->lastItem() }} of {{ $q26->total() }}</div>
        <div class="pagination">{{ $q26->links('pagination::bootstrap-5') }}</div>
    </div>

    <div class="query">
        <h2>27. Full name and ID of employee with the country they are currently working in</h2>
        <table>
            <tr>
                <th>employee_id</th>
                <th>full_name</th>
                <th>country_name</th>
            </tr>
            @foreach($q27 as $r)<tr>
                <td>{{ $r->employee_id }}</td>
                <td>{{ $r->full_name }}</td>
                <td>{{ $r->country_name }}</td>
            </tr>@endforeach
        </table>
        <div class="info">Showing {{ $q27->firstItem() }}-{{ $q27->lastItem() }} of {{ $q27->total() }}</div>
        <div class="pagination">{{ $q27->links('pagination::bootstrap-5') }}</div>
    </div>
</body>

</html>