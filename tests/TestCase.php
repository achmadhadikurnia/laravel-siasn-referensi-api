<?php

namespace Kanekescom\Siasn\Api\Referensi\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Kanekescom\Siasn\Api\Referensi\ReferensiServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('siasn_api.mode', env('SIASN_MODE', 'training'));
        $app['config']->set('siasn_api.debug', (bool) env('SIASN_DEBUG', env('APP_DEBUG')));

        $app['config']->set('siasn_api.apim.production.url', 'https://apimws.bkn.go.id/oauth2/token');
        $app['config']->set('siasn_api.apim.production.grant_type', 'client_credentials');
        $app['config']->set('siasn_api.apim.production.username', env('SIASN_APIM_USERNAME'));
        $app['config']->set('siasn_api.apim.production.password', env('SIASN_APIM_PASSWORD'));

        $app['config']->set('siasn_api.apim.training.url', 'https://training-apimws.bkn.go.id/oauth2/token');
        $app['config']->set('siasn_api.apim.training.grant_type', 'client_credentials');
        $app['config']->set('siasn_api.apim.training.username', env('TRAINING_SIASN_APIM_USERNAME'));
        $app['config']->set('siasn_api.apim.training.password', env('TRAINING_SIASN_APIM_PASSWORD'));

        $app['config']->set('siasn_api.sso.production.url', 'https://sso-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token');
        $app['config']->set('siasn_api.sso.production.grant_type', 'password');
        $app['config']->set('siasn_api.sso.production.client_id', env('SIASN_SSO_CLIENT_ID'));
        $app['config']->set('siasn_api.sso.production.username', env('SIASN_SSO_USERNAME'));
        $app['config']->set('siasn_api.sso.production.password', env('SIASN_SSO_PASSWORD'));

        $app['config']->set('siasn_api.sso.training.url', 'https://iam-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token');
        $app['config']->set('siasn_api.sso.training.grant_type', 'password');
        $app['config']->set('siasn_api.sso.training.client_id', env('TRAINING_SIASN_SSO_CLIENT_ID'));
        $app['config']->set('siasn_api.sso.training.username', env('TRAINING_SIASN_SSO_USERNAME'));
        $app['config']->set('siasn_api.sso.training.password', env('TRAINING_SIASN_SSO_PASSWORD'));

        $app['config']->set('siasn_api.const.instansi_id', env('SIASN_CONST_INSTANSI_ID'));
        $app['config']->set('siasn_api.const.satuan_kerja_id', env('SIASN_CONST_SATUAN_KERJA_ID'));

        $app['config']->set('siasn_api.token_age.apim', env('SIASN_APIM_TOKEN_AGE', 3600 - 60));
        $app['config']->set('siasn_api.token_age.sso', env('SIASN_SSO_TOKEN_AGE', 43200 - 60));
    }
}
