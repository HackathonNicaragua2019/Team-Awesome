// if ("serviceWorker" in navigator) {
//     navigator.serviceWorker.register("sw.js").then(registration => {
//         console.log("SW registrado");
//         console.log(registration);
//     }).catch(error => {
//         console.log("SW registro fallo");
//         console.log(error);
//     })
// }




if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('./service-worker.js')
          .then((reg) => {
            console.log('Service worker registered.', reg);
          });
    });
  }