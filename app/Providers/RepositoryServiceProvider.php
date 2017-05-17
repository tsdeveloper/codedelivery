<?php

namespace BrindaBrasil\Providers;

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
				//Injeta na dependência o serviço CategoriaRepositoryEloquent 
		        //s		empre que chamar o CategoriaRepository
		        //### CATEGORY ###
				$this->app->bind(
		            'BrindaBrasil\Repositories\CategoryRepository',
		            'BrindaBrasil\Repositories\CategoryRepositoryEloquent'
		        );
	
				//### PRODUCT ###	
				$this->app->bind(
							'BrindaBrasil\Repositories\ProductRepository',
							'BrindaBrasil\Repositories\ProductRepositoryEloquent'
						);

				//### USER ###
				$this->app->bind(
							'BrindaBrasil\Repositories\UserRepository',
							'BrindaBrasil\Repositories\UserRepositoryEloquent'
						);

						//### CLIENT ###
				$this->app->bind(
							'BrindaBrasil\Repositories\ClientRepository',
							'BrindaBrasil\Repositories\ClientRepositoryEloquent'
						);
	}
}
