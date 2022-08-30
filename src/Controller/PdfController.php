<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\Routing\Router;
use Spatie\Browsershot\Browsershot;

/**
 * Pdf Controller
 *
 */
class PdfController extends AppController
{
    public function create($name = null)
    {
        $filename = Chronos::now()->format('Y-m-d') . '-invoice.pdf';

        if ($filename !== $name) {
            return $this->redirect([
                'action' => 'create',
                $filename,
                '?' => $this->request->getQueryParams()
            ]);
        }
        $download = $this->request->getQuery('download') === '1';

        $identity = $this->request->getAttribute('identity');

        $authToken = $identity->get('auth_token');
        /**
         * 'header' => 'Authorization',
         * 'tokenPrefix' => 'Token'
         */
        $pdf = Browsershot::url(Router::url([
            '_host' => 'nginx',
            '_port' => 80,
            'action' => 'html'
        ]))
            ->setExtraHttpHeaders([
                'X-Request-From' => 'Browsershot',
                'Authorization' => sprintf('Token %s', $authToken)
            ])
            ->noSandbox()
            // ->consoleMessages();
            ->margins(15, 15, 15, 15)
            // ->setOption('args', ['--disable-web-security'])
            ->pdf();

        // dd($pdf);

        $response = $this->getResponse();

        $response = $response->withStringBody($pdf)
            ->withType('pdf');
        if ($download) {
            $response = $response->withDownload($filename);
        }

        return $response;
    }
    public function html()
    {
        if ($this->request->getHeaderLine('X-Request-From') !== 'Browsershot') {
            return $this->getResponse()
                // ->withStringBody($this->request->getHeaderLine('X-Request-From'))
                ->withStringBody("You are not allow to access that")
                ->withType('text');
        };
        $this->viewBuilder()
            ->setLayout('/Browsershot/default')
            ->setTemplate('browsershot');
    }
}
