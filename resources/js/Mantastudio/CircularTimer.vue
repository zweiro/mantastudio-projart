<template>
    <div class="mb-4">
      <div id="countdown">
      <div id="countdown-number">{{ timerCount }}</div>
      <svg>
          <circle r="18" cx="20" cy="20" :key="key" :class="{fiveSeconds: read, fifteenSeconds: !read}"></circle>
      </svg>
      </div>
    </div>
</template>

<script>
    import { ref, computed } from 'vue'

    export default {
      props: {
        'repeat': Number,
        'read': Boolean
      },
      emits:['timerEnded', 'second'],
      setup(props, context) {
        let timerCount = ref(5);
        let read = computed(() => {
          return props.read;
        });
        let key = computed(() => {
          timerCount.value = read.value ? 5 : 15;
          return props.repeat;
        });
        let timer = setInterval(() => {
          if(timerCount.value > 1) {
            timerCount.value--;
            if(!props.read) {
              context.emit('second');
            }
          } else {
            context.emit('timerEnded');
          }
        },1000);
        return {
          timerCount,
          key,
          read
        }
      },
    }

</script>

<style scoped>
#countdown {
  position: relative;
  margin: auto;
  margin-top: 1em;
  height: 40px;
  width: 40px;
  text-align: center;
}

#countdown-number {
  color: #68626C;
  display: inline-block;
  line-height: 40px;
}

svg {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  transform: rotateY(-180deg) rotateZ(-90deg);
}

svg circle {
  stroke-dasharray: 113px;
  stroke-dashoffset: 0px;
  stroke-linecap: round;
  stroke-width: 4px;
  stroke: #68626C;
  fill: none;
}

.fifteenSeconds {
  animation: countdown 15s linear forwards;
}
.fiveSeconds {
  animation: countdown 5s linear forwards;
}

@keyframes countdown {
  from {
    stroke-dashoffset: 0px;
  }
  to {
    stroke-dashoffset: 113px;
  }
}
</style>