<template>
  <a class="dropdown-item unread">
    {{ unread.data.commenter}} commented on your post
    <span>
      <a :href="posturl">View</a>
    </span>
  </a>
</template>

<script>
export default {
  props: ["unread"],
  data() {
    return {
      posturl: ""
    };
  },
  mounted() {
    console.log(this.unread);
    this.posturl = "posts/" + this.unread.data.postid;
  }
};
</script>
