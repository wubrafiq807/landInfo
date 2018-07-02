<?php

defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'welcome/login/$1';
$route['authenticate'] = 'User/authenticate/$1';
$route['logout'] = 'User/logout/$1';
$route['admin']='Welcome/admin/$1';
//route for Union
$route['admin/addUnion'] = 'UnionController/addUnion/$1';
$route['admin/saveUnion'] = 'UnionController/saveUnion/$1';

$route['admin/getUnionList'] = 'UnionController/getUnionList/$1';
$route['admin/editUnion'] = 'UnionController/editUnion/$1';
$route['admin/deleteUnion'] = 'UnionController/deleteUnion/$1';

//route for Mouza
$route['admin/addMouza'] = 'MouzaController/addMouza/$1';
$route['admin/saveMouza'] = 'MouzaController/saveMouza/$1';

$route['admin/getMouzaList'] = 'MouzaController/getMouzaList/$1';
$route['admin/editMouza'] = 'MouzaController/editMouza/$1';
$route['admin/deleteMouza'] = 'MouzaController/deleteMouza/$1';

//route for Razassa
$route['admin/addRazassa'] = 'RazassaController/addRazassa/$1';
$route['admin/saveRazassa'] = 'RazassaController/saveRazassa/$1';

$route['admin/getRazassaList'] = 'RazassaController/getRazassaList/$1';
$route['admin/editRazassa'] = 'RazassaController/editRazassa/$1';
$route['admin/deleteRazassa'] = 'RazassaController/deleteRazassa/$1';

//route for Razassa
$route['admin/addHolding'] = 'HoldingController/addHolding/$1';
$route['admin/saveHolding'] = 'HoldingController/saveHolding/$1';

$route['admin/getHoldingList'] = 'HoldingController/getHoldingList/$1';
$route['admin/editHolding'] = 'HoldingController/editHolding/$1';
$route['admin/deleteHolding'] = 'HoldingController/deleteHolding/$1';
$route['admin/checkUniqHolding'] = 'HoldingController/checkUniqHolding/$1';

//route for Razassa
$route['admin/addLandInfo'] = 'LandInfoController/addLandInfo/$1';
$route['admin/saveLandInfo'] = 'LandInfoController/saveLandInfo/$1';
$route['admin/getLandInfoList'] = 'LandInfoController/getLandInfoList/$1';
$route['admin/editLandInfo'] = 'LandInfoController/editLandInfo/$1';
$route['admin/deleteLandInfo'] = 'LandInfoController/deleteLandInfo/$1';
$route['admin/getMouzaListByUnion'] = 'LandInfoController/getMouzaListByUnion/$1';
$route['admin/getHoldingListByMouza'] = 'LandInfoController/getHoldingListByMouza/$1';
$route['viewInfo'] = 'LandInfoController/viewInfo/$1';



