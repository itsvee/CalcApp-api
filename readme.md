# CalcApp API (Task 2)

APIs for CalcApp to store data on cloud service. Powered by Laravel (PHP framework) and Google Cloud Platform.

## Namespace and Endpoints

this APIs is running on https://semiotic-axis-194016.appspot.com/ 
(if you click this link and found error, Don't worry :) )

namespace of APIS is

```
/api
```

Also, 3 endpoints are added to this namespace.

<table>
  <tr>
    <th>Endpoint</th>
    <th>HTTP Verb</th>
    <th>Parameters</th>
  </tr>
  <tr>
    <td>/api/getToken</td>
    <td>POST</td>
    <td>uuid</td>
  </tr>
  <tr>
    <td>/api/saveResult</td>
    <td>POST</td>
    <td>token, a_value, b_value, operator</td>
  </tr>
   <tr>
    <td>/api/loadResult</td>
    <td>POST</td>
     <td>token</td>
  </tr>
</table>

## Usage

**/api/getToken**

This is API for get token from server. Validates the user by a user UID or some string and returns a token to use in a CalcApp. If users delete app and install again, they can load histories.

Success response from the server:

```
{
    "data": {
        "uuid": "u40-vvkhxng",
        "token": "Rcp9imJA0gFno8Yw",
        "updated_at": "2018-02-04 17:01:28",
        "created_at": "2018-02-04 17:01:28",
        "id": 18
    },
    "error": false
}
```

**/api/saveResult**

This is API for save history of CalcApp to server. Use token from getToken(string), value A(number), value B(number) and operator(string) to save it. (operator is enum : plus, minus, multiply, divide, power)

Success response from the server:

```
{
    "data": {
        "token_id": 18,
        "a_value": "10",
        "b_value": "-30.2",
        "operator": "multiply",
        "updated_at": "2018-02-04 17:04:31",
        "created_at": "2018-02-04 17:04:31",
        "id": 22
    },
    "error": false
}
```

**/api/loadResult**

This is API for load history of CalcApp from server. It follow by token to send. So this API must send token to get data. It return to array of data by sort date.

Success response from the server:

```
{
    "data": [
        {
            "id": 22,
            "token_id": 18,
            "a_value": 10,
            "b_value": -30.199999999999999,
            "operator": "multiply",
            "created_at": "2018-02-04 17:04:31",
            "updated_at": "2018-02-04 17:04:31"
        }
    ],
    "error": false
}
```

All APIs if error or have problem will return 400

## Built With

* [Google Cloud Platform](https://cloud.google.com) - Cloud service
* [Laravel](https://laravel.com/) - PHP Framework

## Reference
* [https://cloud.google.com/community/tutorials/run-laravel-on-appengine-flexible](https://cloud.google.com/community/tutorials/run-laravel-on-appengine-flexible)

## Authors

* **Weerayut Chalaruk** 
