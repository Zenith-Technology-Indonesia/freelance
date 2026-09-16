<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->double('transportation_allowance')->default(0)->after('positional_allowance');
        });
        Schema::table('employee_salaries', function (Blueprint $table) {
            $table->double('transportation_allowance')->default(0)->after('positional_allowance');
        });
        Schema::table('employee_payslips', function (Blueprint $table) {
            $table->double('transportation_allowance')->default(0)->after('positional_allowance');
            $table->double('prorate_transportation_allowance')->default(0)->after('prorate_positional_allowance');
        });
    }

    public function down(): void
    {
        Schema::table('employee_payslips', fn (Blueprint $table) => $table->dropColumn(['transportation_allowance', 'prorate_transportation_allowance']));
        Schema::table('employee_salaries', fn (Blueprint $table) => $table->dropColumn('transportation_allowance'));
        Schema::table('employees', fn (Blueprint $table) => $table->dropColumn('transportation_allowance'));
    }
};
