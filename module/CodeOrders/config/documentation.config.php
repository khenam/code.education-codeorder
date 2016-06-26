<?php
return array(
    'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => array(
        'description' => 'Handles Payment Types',
        'collection' => array(
            'description' => 'Collections of payment types',
            'GET' => array(
                'description' => 'List all payment types',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes"
       },
       "first": {
           "href": "/ptypes?page={page}"
       },
       "prev": {
           "href": "/ptypes?page={page}"
       },
       "next": {
           "href": "/ptypes?page={page}"
       },
       "last": {
           "href": "/ptypes?page={page}"
       }
   }
   "_embedded": {
       "ptypes": [
           {
               "_links": {
                   "self": {
                       "href": "/ptypes[/:ptypes_id]"
                   }
               }
              "id":"Payment type id",
              "name": "Payment type name"
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Create a new payment type',
                'request' => '{
   "name": "Payment type name"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id":"Payment type id",
   "name": "Payment type name"
}',
            ),
        ),
        'entity' => array(
            'description' => 'Payment type Entity',
            'GET' => array(
                'description' => 'Returns a payment type',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id":"Payment type id",
   "name": "Payment type name"
}',
            ),
            'PATCH' => array(
                'description' => 'Partial update of a payment type',
                'request' => '{
   "name": "Payment type name"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id":"Payment type id",
   "name": "Payment type name"
}',
            ),
            'PUT' => array(
                'description' => 'Update a payment type',
                'request' => '{
   "name": "Payment type name"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id":"Payment type id",
   "name": "Payment type name"
}',
            ),
            'DELETE' => array(
                'description' => 'Delete a payment type',
                'request' => '{
   "name": "Payment type name"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id":"Payment type id",
   "name": "Payment type name"
}',
            ),
        ),
    ),
    'CodeOrders\\V1\\Rest\\Users\\Controller' => array(
        'entity' => array(
            'DELETE' => array(
                'response' => '',
                'request' => '',
                'description' => 'Delete a user',
            ),
            'PUT' => array(
                'description' => 'Update a user',
                'request' => '{
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "User\'s identification",
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
            ),
            'PATCH' => array(
                'description' => 'Partially update a user',
                'request' => '{
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "User\'s identification",
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
            ),
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "User\'s identification",
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
                'description' => 'Return a user',
            ),
            'description' => 'User entity',
        ),
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/users"
       },
       "first": {
           "href": "/users?page={page}"
       },
       "prev": {
           "href": "/users?page={page}"
       },
       "next": {
           "href": "/users?page={page}"
       },
       "last": {
           "href": "/users?page={page}"
       }
   }
   "_embedded": {
       "users": [
           {
               "_links": {
                   "self": {
                       "href": "/users[/:users_id]"
                   }
               }
              "id": "User\'s identification",
              "username": "User\'s login name",
              "password": "User\'s password",
              "first_name": "User\'s first name",
              "last_name": "User\'s last name",
              "role": "User\'s role in the system"
           }
       ]
   }
}',
                'description' => 'List all users',
            ),
            'POST' => array(
                'request' => '{
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "User\'s identification",
   "username": "User\'s login name",
   "password": "User\'s password",
   "first_name": "User\'s first name",
   "last_name": "User\'s last name",
   "role": "User\'s role in the system"
}',
                'description' => 'Create a user',
            ),
            'description' => 'Collection of users',
        ),
        'description' => 'Handles users',
    ),
);
