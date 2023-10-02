<x-app>
    <x-slot name='title'>Employees</x-slot>
    <x-slot name='header'>Employees</x-slot>
    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">FIRST_NAME</th>
                    <th scope="col">LAST_NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE_NUMBER</th>
                    <th scope="col">HIRE_DATE</th>
                    <th scope="col">JOB_ID</th>
                    <th scope="col">SALARY</th>
                    <th scope="col">COMMISSION_PCT</th>
                    <th scope="col">MANAGER_ID</th>
                    <th scope="col">DEPARTMENT_ID</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $employee->FIRST_NAME }}</td>
                        <td>{{ $employee->LAST_NAME }}</td>
                        <td>{{ $employee->EMAIL }}</td>
                        <td>{{ $employee->PHONE_NUMBER }}</td>
                        <td>{{ $employee->HIRE_DATE }}</td>
                        <td>{{ $employee->JOB_ID }}</td>
                        <td>{{ number_format($employee->SALARY, 2) . ' EGP' }}</td>
                        <td>{{ $employee->COMMISSION_PCT ? $employee->COMMISSION_PCT * 100 . ' %' : '0' }}</td>
                        <td>{{ $employee->MANAGER_ID }}</td>
                        <td>{{ $employee->DEPARTMENT_ID }}</td>
                    </tr>
                @empty
                    <tr class="">
                        <td scope="row">No Data Found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</x-app>
