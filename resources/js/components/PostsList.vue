import Echo from 'laravel-echo';

<template>
    <div>
        <!-- Daftar post -->

        <ul>
            <li v-for="post in posts" :key="post.id">
                {{ post.judul }}
            </li>
        </ul>

        <!-- Notifikasi -->

        <div v-if="notification">
            {{ notification.message }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            notification: null,
        };
    },
    mounted() {

        this.fetchPosts();

        // Dengarkan channel 'notifications' menggunakan Laravel Echo
        Echo.channel('notifications')
            .listen('.new-post-notification', (notification) => {
                this.showNotification(notification);
                this.fetchPosts(); // Refresh daftar post setelah mendapatkan notifikasi
            });
    },
    methods: {
        fetchPosts() {
            // Ambil daftar post dari backend (misalnya menggunakan API endpoint)
            // dan simpan dalam variabel `posts`
            axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        showNotification(notification) {
            this.notification = notification;
            setTimeout(() => {
                this.notification = null;
            }, 5000); // Notifikasi akan hilang setelah 5 detik
        },
    },
};
</script>
