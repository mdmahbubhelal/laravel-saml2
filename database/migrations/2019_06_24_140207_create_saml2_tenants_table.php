<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaml2TenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saml2_tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('name')->unique();
            $table->string('idp_entity_id');
            $table->string('idp_login_url');
            $table->string('idp_logout_url')->nullable();
            $table->text('idp_x509_cert');
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saml2_tenants');
    }
}
