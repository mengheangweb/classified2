<template>

<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ lists.length }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li v-for="item in lists">
                <a v-if="item.data.notify_title" class="dropdown-item" href="#">
                    {{ item.data.notify_title }}
                </a>
            </li>

        </ul>
    </li>
</ul>

</template>

<script>
export default{

    data(){
        return {
            lists: [],
        };
    },
    mounted(){

        this.getNotifyList();

        Echo.private('App.Models.User.' + window.user.id)
            .notification((notification) => {
                Notification.requestPermission(notification => {
                    let notify = new Notification("Classified Ads", {
                        body: 'Your post has been approved.'
                    });

                });
            });


    },
    methods: {
        getNotifyList(){
             axios.get('/api/notification/' + window.user.id).then(response => {
                    this.lists = response.data.notifications;
                });
        }
    }

}
</script>