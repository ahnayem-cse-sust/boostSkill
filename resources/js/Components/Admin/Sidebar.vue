<template>
  <div class="bs-sidebar d-flex flex-column flex-shrink-0 p-3 bg-light sidebar-expanded" :class="{ 'sidebar-hide': !state.sidebarExpanded }">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <span class="fs-4 sidebar-ttl">BoostSkill</span>
      <font-awesome-icon @click="sidebarClicked()" class="left-icon sidebar-ttl" :icon="['fas', 'chevron-left']" />
      <font-awesome-icon @click="sidebarClicked()" class="bar-icon" :icon="['fas', 'bars']" />
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'home']" />
          <span class="sidebar-ttl">Home</span> 
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Dashboard</span>
        </a>
      </li>
      <li >
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#course-collapse" aria-expanded="false">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Course</span>
        </button>
        <div class="collapse" id="course-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a :href="route('admin.course.create')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Create Course</span>
            </a></li>
            <li><a :href="route('admin.course.list')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Courses</span>
            </a></li>
          </ul>
        </div>
        </li>
      <li>
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#class-collapse" aria-expanded="false">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Online Classes</span>
        </button>
        <div class="collapse" id="class-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a :href="route('admin.class.create')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Create Class</span>
            </a></li>
            <li><a :href="route('admin.class.list')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">All Classes</span>
            </a></li>
          </ul>
        </div>
      </li>
      <li>
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#exam-collapse" aria-expanded="false">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Exams</span>
        </button>
        <div class="collapse" id="exam-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a :href="route('admin.exam.create')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Create Exam</span>
            </a></li>
            <li><a :href="route('admin.exam.list')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">All Exams</span>
            </a></li>
          </ul>
        </div>
      </li>
      <li>
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#certificate-collapse" aria-expanded="false">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Certificate</span>
        </button>
        <div class="collapse" id="certificate-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a :href="route('admin.certificate.create')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Create Certificate</span>
            </a></li>
            <li><a :href="route('admin.certificate.list')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">All Certificate</span>
            </a></li>
          </ul>
        </div>
      </li>
      <li>
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#assignment-collapse" aria-expanded="false">
          <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
          <span class="sidebar-ttl">Assignment</span>
        </button>
        <div class="collapse" id="assignment-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a :href="route('admin.assignment.create')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">Create Assignment</span>
            </a></li>
            <li><a :href="route('admin.assignment.list')" class="link-dark rounded">
              <font-awesome-icon class="sidebar-icon" :icon="['fas', 'eye']" />
              <span class="sidebar-ttl">All Assignment</span>
            </a></li>
          </ul>
        </div>
      </li>

    </ul>
    <hr>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
const state = reactive( {sidebarExpanded:true} );

const emits = defineEmits(["clickedHideSidebar"])

function sidebarClicked(){
  state.sidebarExpanded=!state.sidebarExpanded;
  emits('clickedHideSidebar');
}

</script>

<style>
.sidebar-expanded{
  width: 280px;
}
.sidebar-hide{
  width: 80px;
}
.sidebar-ttl{
  padding: 10px;
}
.sidebar-hide .sidebar-ttl{
  display: none;
}
.sidebar-hide .sidebar-icon{
  width: 20px;
  height: 20px;
}
.bar-icon{
  display: none;
}
.sidebar-hide .bar-icon{
  display: inherit;
  width: 25px;
  height: 25px;
  padding: 16px;
}
.left-icon{
  margin-left: 105px;
}

.bs-sidebar{
  transition: 0.5s;;
}
body {
  min-height: 100vh;
  min-height: -webkit-fill-available;
}

html {
  height: -webkit-fill-available;
}

main {
  display: flex;
  flex-wrap: nowrap;
  height: 100vh;
  /* height: -webkit-fill-available; */
  max-height: 100vh;
  overflow-x: auto;
  overflow-y: hidden;
}

.bi {
  vertical-align: -.125em;
  pointer-events: none;
  fill: currentColor;
}

.dropdown-toggle { outline: 0; }

.nav-flush .nav-link {
  border-radius: 0;
}

.btn-toggle {
  display: inline-flex;
  align-items: center;
  padding: .25rem .5rem;
  font-weight: 600;
  color: rgba(0, 0, 0, .65);
  background-color: transparent;
  border: 0;
}
.btn-toggle:hover,
.btn-toggle:focus {
  color: rgba(0, 0, 0, .85);
  background-color: #d2f4ea;
}

.btn-toggle::before {
  width: 1.25em;
  line-height: 0;
  content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
  transition: transform .35s ease;
  transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
  color: rgba(0, 0, 0, .85);
}
.btn-toggle[aria-expanded="true"]::before {
  transform: rotate(90deg);
}

.btn-toggle-nav a {
  display: inline-flex;
  padding: .1875rem .5rem;
  margin-top: .125rem;
  margin-left: 1.25rem;
  text-decoration: none;
}
.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
  background-color: #d2f4ea;
}

.scrollarea {
  overflow-y: auto;
}

.fw-semibold { font-weight: 600; }
.lh-tight { line-height: 1.25; }

</style>