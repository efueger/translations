<?php

use Bu4ak\Roles\Enum\RoleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users', function ($table) {
                $table->unsignedTinyInteger('role_id')
                    ->after('id')
                    ->default(RoleType::USER);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users', function ($table) {
                $table->dropColumn('role_id');
            }
        );
    }
}
