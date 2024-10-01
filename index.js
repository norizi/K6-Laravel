 

import http from "k6/http";
import { sleep } from "k6";

export let options = {
  vus: 500,
  duration: "60s",
};

export default function () {
  //http.get("http://127.0.0.1:8000");
  http.get("https://spik.moha.gov.my/");
  sleep(1); //berhenti dalam second
}