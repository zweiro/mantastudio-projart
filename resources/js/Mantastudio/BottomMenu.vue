<template>
  <ul class="w-full flex items-center justify-evenly sm:justify-center fixed bottom-0 h-20 border-t-2 border-gray-500">
      <bottom-menu-item src="/images/menu/game.svg" link="/start" alt="lien du jeu"></bottom-menu-item>
      <bottom-menu-item src="/images/menu/ranking.svg" link="/ranking" alt="lien du ranking"></bottom-menu-item>
      <bottom-menu-item src="/images/menu/friends.svg" link="/friends" alt="lien des amis"></bottom-menu-item>
      <bottom-menu-item src="/images/menu/profile.svg" link="/profile" alt="lien du profile utilisateur"></bottom-menu-item>
  </ul>
</template>

<script>
import BottomMenuItem from './BottomMenuItem'

export default {
    components: {
        BottomMenuItem,
    }
}
</script>

<style scoped>
    ul {
        background-color: #FEF9F7;
    }
</style>