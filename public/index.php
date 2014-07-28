<?php require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Morgan\Locators\ResourceRecordLocator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Yaml\Parser;

$app = new Application();

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/log.log',
));

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
));

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->get('/', function() use ($app) {
    return $app['twig']->render('index.html');
});

$app->get('/search', function(Request $request) use ($app) {
    $q = $request->get('q');

    $errors = $app['validator']->validateValue($q, array(
        new Assert\NotBlank(),
        new Morgan\Constraints\DomainName()
    ));

    if (count($errors)) {
        foreach ($errors as $error) {
            $app['session']->getFlashBag()->add('error', $error);
        }

        return new RedirectResponse('/');
    }

    $parser = new Parser();
    $locator = new ResourceRecordLocator();

    $types = $parser->parse(file_get_contents(__DIR__.'./../types.yml'));
    $phrases = $parser->parse(file_get_contents(__DIR__.'/../phrases.yml'));
    $domain = $locator->findRecordsForDomainName($q);
    
    return $app['twig']->render('results.html', compact('domain', 'phrases', 'types'));
});

$app->run();