<template>
    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <router-link class="navbar-brand" :to="'/'">Figured Blog</router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <router-link class="nav-link" :to="'/'">Home
                  <span class="sr-only">(current)</span>
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
</template>