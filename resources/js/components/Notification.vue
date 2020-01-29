<template>
  <li class="nav-item dropdown">
    <a
      id="navbarDropdown"
      href="#"
      class="nav-link"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      v-pre
    >
      <span>
        <i class="fas fa-bell"></i>
        <span class="badge badge-light">{{ unreadNotifications.Length}}</span>
      </span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
    </div>
  </li>
</template>

<script>
import NotificationItem from "./NotificationItem.vue";
export default {
  props: ["userid", "unreads"],
  components: { NotificationItem },
  data() {
    return {
      unreadNotifications: this.unreads
    };
  },
  mounted() {
    // console.log(this.unreads.length);
    // console.log(this.unreadNotifications);

    Echo.private("App.User." + this.userid).notification(notification => {
      // console.log(notification);
      let newUnreadNotifications = {
        data: {
          data: notification.data,
          commenter: notification.commenter,
          postid: notification.post_id
        }
      };
      // console.log(newUnreadNotifications);
      this.unreadNotifications.push(newUnreadNotifications);
    });

    // Echo.private("App.User." + this.userid).notification(notification => {
    //   console.log(notification);
    //   // let newUnreadNotifications = {
    //   //   data: { thread: notification.thread, user: notification.user }
    //   // };
    //   // this.unreadNotifications.push(newUnreadNotifications);
    // });
  }
};
</script>
