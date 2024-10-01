<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW employees_view AS
                SELECT 
                    emp.enterprise_id as Cod_Empresa,
                    emp.admission_date as Dt_admissao,
                    emp.dismissal_date as Dt_demissao,
                    emp.registration_number as Matricula,
                    emp.name as Funcionario,
                    emp.cpf as Cpf,
                    pos.name as Des_cargo_ext,
                    emp.gender as Sexo,
                    emp.cpts_number as Nr_cpts,
                    emp.cpts_serial as Serie_cpts,
                    emp.cpts_uf as Uf_cpts,
                    emp.cpts_date as Dt_cpts,
                    emp.cost_center as Centro_custo,
                    emp.position_id as Id_cargo_ext,
                    emp.capacity_unit as Id_unid_lot,
                    emp.salary as Vl_salario,
                    emp.rg as Nr_rg
                FROM employees emp
                LEFT JOIN positions pos ON pos.id = emp.position_id
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS employee_view");
    }
};
