<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            if (!Schema::hasColumn('admins', 'document_number')) {
                $table->string('document_number')->nullable();
            }
            if (!Schema::hasColumn('admins', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('admins', 'position')) {
                $table->string('position')->nullable();
            }
            if (!Schema::hasColumn('admins', 'role')) {
                $table->string('role')->default('admin');
            }
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            if (Schema::hasColumn('admins', 'document_number')) {
                $table->dropColumn('document_number');
            }
            if (Schema::hasColumn('admins', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('admins', 'position')) {
                $table->dropColumn('position');
            }
            if (Schema::hasColumn('admins', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
}