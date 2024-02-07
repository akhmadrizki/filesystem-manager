type StickyKitOptions = {
  /**
   * Boolean to enable or disable the ability of the sticky element to scroll
   * independently of the scrollbar when it’s taller than the viewport.
   * Defaults to `true` for enabled.
   */
  inner_scrolling: boolean,

  /**
   * The name of the CSS class to apply to elements when they have become stuck.
   * Defaults to `"is_stuck"`.
   */
  sticky_class: string,

  /**
   * Integer specifying that a recalc should automatically take place between
   * that many ticks. A tick takes place on every scroll event. Defaults to
   * never calling recalc on a tick.
   */
  recalc_every: number,

  /**
   * offsets the initial sticking position by of number of pixels, can be
   * either negative or positive
   */
  offset_top: number,

  /**
   * Boolean to control whether elements bottom out. Defaults to `true`
   */
  bottoming: boolean,

  /**
   * The element will be the parent of the sticky item. The dimensions of
   * the parent control when the sticky element bottoms out. Defaults to
   * the closest parent of the sticky element. Can be a selector.
   */
  parent: JQuery<HTMLElement>,

  /**
   * either a selector to use for the spacer element, or false to disable
   * the spacer. The selector is passed to `closest`, so you should nest
   * the sticky element within the spacer. Defaults to Stiky Kit creating
   * its own spacer.
   */
  spacer: JQuery<HTMLElement> | false,
}

interface JQuery {
  stick_in_parent(opts: Partial<StickyKitOptions>): void;
}
