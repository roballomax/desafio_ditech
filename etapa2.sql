SELECT dep.dept_name, emp.first_name, DATEDIFF(dept_emp.to_date, dept_emp.from_date) as diferenca_datas
FROM employees.departments dep 
INNER JOIN employees.dept_emp ON (dept_emp.dept_no = dep.dept_no)
INNER JOIN employees.employees emp ON (dept_emp.emp_no = emp.emp_no)
ORDER BY diferenca_datas DESC
LIMIT 10;