<?php
return [
    ['/home', 'examples/site/index'],
    ['/login', 'examples/site/login'],
    ['/logout', 'examples/site/logout'],
    ['/routes/get/[i:id]?', 'examples/routes/get'],
    ['/routes/[i:id]?', 'examples/routes/index'],
    ['/contacts', 'examples/contacts/index'],
    ['/add-contact', 'examples/contacts/add'],
    ['/edit-contact/[i:id]?', 'examples/contacts/edit'],
    ['/delete-contact/[i:id]?', 'examples/contacts/delete']
];