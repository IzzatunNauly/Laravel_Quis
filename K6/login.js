import { check } from 'k6';
import http from 'k6/http';
export default function () {
  let res = http.get('http://127.0.0.1:8000/');
  check(res, {
    'body contains text': (r) => r.body.includes('Collection of simple web-pages suitable for load testing.'),
  });
}