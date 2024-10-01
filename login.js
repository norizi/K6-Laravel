 
import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
  vus: 10,
  duration: "60s",
};

export default function () {
    // Replace with your actual login endpoint
    const loginEndpoint = 'http://127.0.0.1:8000/api/api-login';

    // User credentials
    const credentials = {
        email: 'zul_hadi97@yahoo.com',
        password: 'Pass!123',
    };

    const params = {
        headers: {
            'Content-Type': 'application/json',
        },
    };

   const loginResponse = http.put(loginEndpoint, JSON.stringify(credentials), params);

  check(loginResponse, {
    'status is 200': (response) => response.status === 200,
  });

   console.log(loginResponse.body)
  
  sleep(1);
}