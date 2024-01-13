import http from 'k6/http';
import { sleep } from 'k6';


export const options = {
    tags: { name: 'local-request' }, // Optional: Add tags for better identification in the results
    vus: 10,
    duration: '10s',
};
export default function() {
    http.get('http://localhost:8003/');
    sleep(1);
}