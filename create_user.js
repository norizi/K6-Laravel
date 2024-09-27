import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
  vus: 20,
  duration: "5s",
};


export default function () {
    // Replace with your actual database connection details
    const url = 'http://127.0.0.1:8000/api/api-create';
     

    // Sample data to be inserted (adjust as needed)
    const data = {
        name: 'John Doe',
		email: 'John@gmail.com',
		password: 'John@gmail.com',
		id_jabatan: '1',
		no_tel_pejabat: '1',
		no_hp: '1',
		peranan: '1',
        no_kp: '999999999999',
		status_peserta: '1',
		batch: 'SPIK PDRM 2024', 
    };

    const params = {
        headers: {
            'Content-Type': 'application/json',
        },
    };

    const response = http.put(url, JSON.stringify(data), params);

    check(response, {
        'status is 201': (r) => r.status === 201,
        'transaction is complete': (r) => r.body.includes('success'),
    });
	console.log(response.body)
    sleep(1);
}