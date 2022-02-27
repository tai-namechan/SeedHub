<template>
  <div class="like-btn-flex">
    <button
      v-if="!liked"
      type="button"
      @click="like(meetingId)"
      class="like-button"
    >
      <i class="fa fa-thumbs-up" style="color: white"></i>
      <!-- &#9825; -->
      ええやん
      {{ likeCount }}
    </button>

    <button
      v-else
      type="button"
      @click="unlike(meetingId)"
      class="unlike-button"
    >
      <i class="fa fa-thumbs-up"></i>
      <!-- &#9829; -->
      ええやん{{ likeCount }}
    </button>
  </div>
</template>

<script>
export default {
  props: ["meetingId", "userId", "defaultLiked", "defaultCount"],

  data() {
    return {
      liked: false,
      likeCount: 0,
    };
  },
  created() {
    this.liked = this.defaultLiked;
    this.likeCount = this.defaultCount;
  },

  methods: {
    like(meetingId) {
      let url = `/api/meetings/${meetingId}/like`;
      console.log(1);
      axios
        .post(url, {
          user_id: this.userId,
        })
        .then((response) => {
          this.liked = true;
          this.likeCount = response.data.likeCount;
        })
        .catch((error) => {
          alert(error);
        });
    },

    unlike(meetingId) {
      let url = `/api/meetings/${meetingId}/unlike`;
      axios
        .post(url, {
          user_id: this.userId,
        })
        .then((response) => {
          this.liked = false;
          this.likeCount = response.data.likeCount;
        })
        .catch((error) => {
          alert(error);
        });
    },
  },
};
</script>

<style scoped>
.like-btn-flex {
  display: flex;
  justify-content: flex-end;
  transform: rotate(2deg);
}
.like-button {
  width: 90px;
  height: 30px;
  background-color: #839a80;
  border-radius: 15px;
  cursor: pointer;
  margin-top:10px;
  color:white;
}
.like-button:hover {
  opacity: 0.7;
}

.unlike-button {
  width: 90px;
  height: 30px;
  background-color: #839a80;
  border-radius: 15px;
  cursor: pointer;
  margin-top:10px;
}
.unlike-button:hover {
  opacity: 0.7;
}
</style>
