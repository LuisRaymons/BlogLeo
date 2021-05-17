<div id="footerNumber">
   <p class="pageNum parrafoNum">
        Informes al <span class="parrafoNum">  Cel:</span>33 11 51 17 25

   </p>
</div>


<style>
#footerNumber {
    position: fixed;
    bottom: 8px;
    z-index: 53;
    margin-left: 30%;
}

#footerNumber p {
    font-size: 2.25em;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    margin-left: 50px;
    text-align: center;
}

.parrafoNum {
   text-shadow: 3px 3px 1px rgba(0, 0, 0, 1);
   color: red;
}

@media only screen and (max-width: 550px){
  #footerNumber {
      position: fixed;
      bottom: 8px;
      z-index: 53;
      margin-left: 5%;
  }
  #footerNumber p {
      font-size: 1.25em;
      font-family: 'Open Sans', sans-serif;
  }

  .parrafoNum {
     text-shadow: 3px 3px 1px rgba(0, 0, 0, 1);
     color: blue;
  }
}

</style>
