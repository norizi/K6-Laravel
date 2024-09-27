import http from 'k6/http';
import { check, group, sleep } from 'k6';

export let options = {
  vus: 500,
  duration: "60s",
};

export default function () {
  group('Job Queue Creation', () => {
    // Replace with your actual API endpoint
    const url = 'http://127.0.0.1:8000/api/api-create-job-queue';

    // Make a POST request to the API endpoint
    let res = http.post(url);

    // Check the response status code
    check(res, {
      'Status code is 201': (r) => r.status === 201,
    });
	
	console.log(res.body)

    // Parse the JSON response
    let json = JSON.parse(res.body);

    // Check the response message
    check(json, {
      'Message is "User Job created successfully"': (r) => r.message === 'User Job created successfully',
    });
  });
  
  

  // Add a sleep time between requests (optional)
  sleep(1);
}