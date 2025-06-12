import React, { useEffect } from "react";
import axios from "axios";

function App() {
  useEffect(() => {
    axios.get("http://localhost:8000/api/test")
      .then(response => {
        console.log("Réponse API:", response.data);
      })
      .catch(error => {
        console.error("Erreur API:", error);
      });
  }, []);

  return (
    <div>
      <h1>Test API Laravel depuis React</h1>
    </div>
  );
}

export default App;
