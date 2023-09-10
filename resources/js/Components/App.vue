<template>
    <div id="app">
      <AppSlider :slides="slides" />
    </div>
  </template>
  
  <script>
  import AppSlider from "@/Components/AppSlider.vue";
  export default {
    name: "App",
    data() {
      return {
        slides: [
          {
            image: "https://images2.minutemediacdn.com/image/upload/c_crop,h_1613,w_2400,x_0,y_17/v1572194246/shape/mentalfloss/87226-gettyimages-537121731.jpg?itok=RQxqLlyM",
            text: "Veterinaria"
          },
          {
            image: "https://theobjective.com/wp-content/uploads/2022/05/014510/loros.jpg",
            text: ""
          },
          {
            image: "https://cdn.pixabay.com/photo/2016/11/21/17/42/dog-1846742_960_720.jpg",
            text: "Los mejores servicios 😸"
          }
        ],
      };
    },
    components: {
      AppSlider,
    },
  };
  </script>
  
  <style>
  html,
  body {
    height: 50%;
    margin: 0;
    padding: 0;
  }
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  </style>