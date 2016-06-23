# Make My Donation - In Memory Of API - PHP

Follow the examples bellow for usage. More information about our API resources and the allowed parameters can be checked at: http://docs.funeralsmakemydonationorg.apiary.io

```php
require_once('/path/to/makemydonation_imo_api/init.php');

// Get a list of funeral homes.
$funeral_homes = new \MakemydonationImo\FuneralHome();
$funeral_homes->setAuth('username', 'apikey');
$funeral_homes->useSandbox();
$funeral_homes->index();
$funeral_home_list = $funeral_homes->response();

var_dump($funeral_home_list);

// Get a single funeral home.
$funeral_home = new \MakemydonationImo\FuneralHome();
$funeral_home->setAuth('username', 'apikey');
$funeral_home->useSandbox();
$funeral_home->retrieve(1);
$funeral_home = $funeral_home->response();

var_dump($funeral_home);

// Update that one funeral home.
$funeral_home->name = 'New name for the funeral home';
$funeral_home = new \MakemydonationImo\FuneralHome();
$funeral_home->setAuth('username', 'apikey');
$funeral_home->useSandbox();
$funeral_home->update($funeral_home->id, $funeral_home);
$funeral_home_updated = $funeral_home->response();

var_dump($funeral_home_updated);

// Create a new funeral home.
$funeral_home_new_data = array(
    'name' => 'New Funeral Home',
    'subdomain' => 'new',
);
$funeral_home_new = new \MakemydonationImo\FuneralHome();
$funeral_home_new->setAuth('username', 'apikey');
$funeral_home_new->useSandbox();
$funeral_home_new->create($funeral_home_new_data);
$funeral_home_created = $funeral_home_new->response();

var_dump($funeral_home_created);

// Get a list of funeral home cases.
$cases = new \MakemydonationImo\FuneralHomeCase();
$cases->setAuth('username', 'apikey');
$cases->useSandbox();
$cases->index();
$case_list = $cases->response();

var_dump($case_list);

// Get a single funeral home case.
$case = new \MakemydonationImo\FuneralHomeCase();
$case->setAuth('username', 'apikey');
$case->useSandbox();
$case->retrieve(1);
$case = $case->response();

var_dump($case);

// Update that one funeral home case.
$case->name = 'New name for the case';
$case = new \MakemydonationImo\FuneralHomeCase();
$case->setAuth('username', 'apikey');
$case->useSandbox();
$case->update($case->id, $case);
$case_updated = $case->response();

var_dump($case_updated);

// Create a new funeral home case.
$case_new_data = array(
    'name' => 'New Case',
    'funeral_home' => 1,
);
$case_new = new \MakemydonationImo\FuneralHomeCase();
$case_new->setAuth('username', 'apikey');
$case_new->useSandbox();
$case_new->create($case_new_data);
$case_created = $case_new->response();

var_dump($case_created);
```
