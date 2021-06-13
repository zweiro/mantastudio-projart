<template>
    <div id="countdown">
    <div id="countdown-number">{{ timerCount }}</div>
    <svg>
        <circle r="18" cx="20" cy="20"></circle>
    </svg>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                timerCount: 10
            }
        },

        watch: {

            timerCount: {
                handler(value) {

                    if (value > 0) {
                        setTimeout(() => {
                            this.timerCount--;
                        }, 1000);
                    }

                },
                immediate: true 
            }

        }
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
  animation: countdown 10s linear forwards;
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