<div x-data="noticesHandler()"
    class="fixed top-10 right-10 gap-3 pr-10 inset-0 flex flex-col items-end justify-start h-screen w-screen"
    @notice.window="add($event.detail)" style="pointer-events:none">

    <template x-for="notice of notices" :key="notice.id">
        <div x-show="visible.includes(notice)" x-transition:enter="transition ease-in duration-200"
            x-transition:enter-start="transform opacity-0 translate-y-2" x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-out duration-500"
            x-transition:leave-start="transform translate-x-0 opacity-100"
            x-transition:leave-end="transform translate-x-full opacity-0" @click="remove(notice.id)"
            class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow z-[5000]">
            <div class="ms-3 text-sm font-normal" x-text="notice.text">Set yourself free.</div>

        </div>
    </template>
</div>

<script>
    function noticesHandler() {
        return {
            notices: [],
            visible: [],
            add(notice) {
                notice.id = Date.now()
                this.notices.push(notice)
                this.fire(notice.id)
            },
            fire(id) {
                this.visible.push(this.notices.find(notice => notice.id == id))
                const timeShown = 2000 * this.visible.length
                setTimeout(() => {
                    this.remove(id)
                }, timeShown)
            },
            remove(id) {
                const notice = this.visible.find(notice => notice.id == id)
                const index = this.visible.indexOf(notice)
                this.visible.splice(index, 1)
            },
        }
    }
</script>
