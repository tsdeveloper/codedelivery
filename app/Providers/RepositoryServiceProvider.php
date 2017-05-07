<?php

namespace AgendaWeb\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	
	/**
	* Bootstrap the application services.
	     *
	     * @return void
	     */
	    public function boot()
	    {
		//
	}
	
	
	/**
	* Register the application services.
	     *
	     * @return void
	     */
	    public function register()
	    {
		//I		njeta na dependência o serviço CategoriaRepositoryEloquent 
		        //s		empre que chamar o CategoriaRepository
		        $this->app->bind(
		            'AgendaWeb\Repositories\CategoriaRepository',
		            'AgendaWeb\Repositories\CategoriaRepositoryEloquent'
		        );
		
		$this->app->bind(
		            'AgendaWeb\Repositories\EstandeRepository',
		            'AgendaWeb\Repositories\EstandeRepositoryEloquent'
		        );
		
		$this->app->bind(
		            'AgendaWeb\Repositories\ParticipanteRepository',
		            'AgendaWeb\Repositories\ParticipanteRepositoryEloquent'
		        );
		
		$this->app->bind(
		            'AgendaWeb\Repositories\UserRepository',
		            'AgendaWeb\Repositories\UserRepositoryEloquent'
		        );
	}
}
