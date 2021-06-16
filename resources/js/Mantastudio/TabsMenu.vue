<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="h3 font-bold uppercase px-2 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(1)" v-bind:class="{'pinkText bg-white': openTab !== 1, 'text-white pinkBG': openTab === 1}">
            {{tab1}}
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="h3 font-bold uppercase px-2 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(2)" v-bind:class="{'pinkText bg-white': openTab !== 2, 'text-white pinkBG': openTab === 2}">
            {{tab2}}
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="h3 font-bold uppercase px-2 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(3)" v-bind:class="{'pinkText bg-white': openTab !== 3, 'text-white pinkBG': openTab === 3}">
            {{tab3}}
          </a>
        </li>
      </ul>
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div class="px-4 py-5 flex-auto">
          <div class="tab-content tab-space">
            <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
              <slot name="content1"></slot>
            </div>
            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
              <slot name="content2"></slot>
            </div>
            <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
              <slot name="content3"></slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: {
            tab1: String,
            tab2: String,
            tab3: String,
        },
        setup(props) {  
            return {
                tab1: props.tab1,
                tab2: props.tab2,
                tab3: props.tab3,
            }
        },
        data() {
            return {
            openTab: 1
            }
        },
        methods: {
            toggleTabs: function(tabNumber){
            this.openTab = tabNumber
            }
        }
    }
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2? family=Poppins:wght@600&display=swap');
    h3 {
        font-family: "Poppins";
        font-variant: small-caps;
    }

    .pinkText {
      color: #F396A1;
    }

    .pinkBG {
      background-color: #F396A1;
    }
</style>