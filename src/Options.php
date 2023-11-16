<?php

namespace Emsephron\LaravelSplide;

use BackedEnum;
use Emsephron\LaravelSplide\Concerns\PreConfigurable;
use Emsephron\LaravelSplide\Enums\CarouselDirection;
use Emsephron\LaravelSplide\Enums\CarouselType;
use Emsephron\LaravelSplide\Enums\Focus;
use Emsephron\LaravelSplide\Enums\MediaQuery;
use Emsephron\LaravelSplide\Enums\PaginationDirection;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionProperty;

/**
 * @implements Arrayable<string, mixed>
 */
class Options implements Arrayable
{
    use PreConfigurable;

    protected ?CarouselType $type = null;

    public function type(CarouselType|null $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): ?CarouselType
    {
        return $this->type;
    }

    protected ?string $role = 'region';

    public function role(string|null $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getRole(): string|null
    {
        return $this->role;
    }

    protected ?string $label = null;

    public function label(string|null $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string|null
    {
        return $this->label;
    }

    protected ?string $labelledBy = null;

    public function labelledBy(string|null $labelledBy): static
    {
        $this->labelledBy = $labelledBy;

        return $this;
    }

    public function getLabelledBy(): string|null
    {
        return $this->labelledBy;
    }

    protected bool $rewind = false;

    public function rewind(bool $rewind = true): static
    {
        $this->rewind = $rewind;

        return $this;
    }

    public function getRewind(): bool
    {
        return $this->rewind;
    }

    protected int $speed = 400;

    public function speed(int $speed): static
    {
        if ($speed < 0) {
            $speed = 0;
        }

        $this->speed = $speed;

        return $this;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    protected ?int $rewindSpeed = null;

    public function rewindSpeed(int|null $rewindSpeed): static
    {
        if ($rewindSpeed < 0) {
            $rewindSpeed = 0;
        }

        $this->rewindSpeed = $rewindSpeed;

        return $this;
    }

    public function getRewindSpeed(): int|null
    {
        return $this->rewindSpeed;
    }

    protected ?bool $rewindByDrag = null;

    public function rewindByDrag(bool|null $rewindByDrag): static
    {
        $this->rewindByDrag = $rewindByDrag;

        return $this;
    }

    public function getRewindByDrag(): bool|null
    {
        return $this->rewindByDrag;
    }

    protected string|int $width = '100vw';

    public function width(string|int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getWidth(): string|int
    {
        return $this->width;
    }

    protected string|int $height = '100vh';

    public function height(string|int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): string|int
    {
        return $this->height;
    }

    protected string|int|null $fixedWidth = null;

    public function fixedWidth(string|int|null $fixedWidth): static
    {
        $this->fixedWidth = $fixedWidth;

        return $this;
    }

    public function getFixedWidth(): string|int|null
    {
        return $this->fixedWidth;
    }

    protected string|int|null $fixedHeight = null;

    public function fixedHeight(string|int|null $fixedHeight): static
    {
        $this->fixedHeight = $fixedHeight;

        return $this;
    }

    public function getFixedHeight(): string|int|null
    {
        return $this->fixedHeight;
    }

    protected ?int $heightRatio = null;

    public function heightRatio(int|null $heightRatio): static
    {
        $this->heightRatio = $heightRatio;

        return $this;
    }

    public function getHeightRatio(): int|null
    {
        return $this->heightRatio;
    }

    protected bool $autoWidth = false;

    public function autoWidth(bool $autoWidth = true): static
    {
        $this->autoWidth = $autoWidth;

        return $this;
    }

    public function getAutoWidth(): bool
    {
        return $this->autoWidth;
    }

    protected bool $autoHeight = false;

    public function autoHeight(bool $autoHeight = true): static
    {
        $this->autoHeight = $autoHeight;

        return $this;
    }

    public function getAutoHeight(): bool
    {
        return $this->autoHeight;
    }

    protected int $start = 0;

    public function start(int $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getStart(): int
    {
        return $this->start;
    }

    protected int $perPage = 1;

    public function perPage(int $perPage): static
    {
        $this->perPage = $perPage;

        return $this;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    protected ?int $perMove = null;

    public function perMove(int|null $perMove): static
    {
        $this->perMove = $perMove;

        return $this;
    }

    public function getPerMove(): int|null
    {
        return $this->perMove;
    }

    protected ?int $clones = null;

    public function clones(int|null $clones): static
    {
        $this->clones = $clones;

        return $this;
    }

    public function getClones(): int|null
    {
        return $this->clones;
    }

    protected bool $cloneStatus = true;

    public function cloneStatus(bool $cloneStatus): static
    {
        $this->cloneStatus = $cloneStatus;

        return $this;
    }

    public function getCloneStatus(): bool
    {
        return $this->cloneStatus;
    }

    protected int|Focus $focus = Focus::CENTER;

    public function focus(int|Focus $focus): static
    {
        $this->focus = $focus;

        return $this;
    }

    public function getFocus(): int|Focus
    {
        return $this->focus;
    }

    protected string|int|null $gap = null;

    public function gap(string|int|null $gap): static
    {
        $this->gap = $gap;

        return $this;
    }

    public function getGap(): string|int|null
    {
        return $this->gap;
    }

    protected Padding|int|string|null $padding = null;

    public function padding(Padding|int|string|null $padding): static
    {
        $this->padding = $padding;

        return $this;
    }

    public function getPadding(): Padding|int|string|null
    {
        return $this->padding;
    }

    protected bool $arrows = true;

    public function arrows(bool $arrows): static
    {
        $this->arrows = $arrows;

        return $this;
    }

    public function getArrows(): bool
    {
        return $this->arrows;
    }

    protected bool $pagination = true;

    public function pagination(bool $pagination): static
    {
        $this->pagination = $pagination;

        return $this;
    }

    public function getPagination(): bool
    {
        return $this->pagination;
    }

    protected bool $paginationKeyboard = true;

    public function paginationKeyboard(bool $paginationKeyboard): static
    {
        $this->paginationKeyboard = $paginationKeyboard;

        return $this;
    }

    public function getPaginationKeyboard(): bool
    {
        return $this->paginationKeyboard;
    }

    protected ?PaginationDirection $paginationDirection = null;

    public function paginationDirection(PaginationDirection|null $paginationDirection): static
    {
        $this->paginationDirection = $paginationDirection;

        return $this;
    }

    public function getPaginationDirection(): PaginationDirection|null
    {
        return $this->paginationDirection;
    }

    protected ?string $easing = null;

    public function easing(string|null $easing): static
    {
        $this->easing = $easing;

        return $this;
    }

    public function getEasing(): string|null
    {
        return $this->easing;
    }

    protected ?string $easingFunc = null;

    public function easingFunc(string|null $easingFunc): static
    {
        $this->easingFunc = $easingFunc;

        return $this;
    }

    public function getEasingFunc(): string|null
    {
        return $this->easingFunc;
    }

    protected bool|string $drag = 'free';

    public function drag(bool|string $drag): static
    {
        if (is_string($drag) && $drag !== 'free') {
            throw new InvalidArgumentException('Drag must be a boolean or "free"');
        }

        $this->drag = $drag;

        return $this;
    }

    public function getDrag(): bool|string
    {
        return $this->drag;
    }

    protected bool $snap = false;

    public function snap(bool $snap = true): static
    {
        $this->snap = $snap;

        return $this;
    }

    public function getSnap(): bool
    {
        return $this->snap;
    }

    protected ?string $noDrag = null;

    public function noDrag(string|null $noDrag): static
    {
        $this->noDrag = $noDrag;

        return $this;
    }

    public function getNoDrag(): string|null
    {
        return $this->noDrag;
    }

    protected DragMinThreshold|int $dragMinThreshold = 10;

    public function dragMinThreshold(DragMinThreshold|int $dragMinThreshold): static
    {
        $this->dragMinThreshold = $dragMinThreshold;

        return $this;
    }

    public function getDragMinThreshold(): DragMinThreshold|int
    {
        return $this->dragMinThreshold;
    }

    protected int $flickPower = 600;

    public function flickPower(int $flickPower): static
    {
        $this->flickPower = $flickPower;

        return $this;
    }

    public function getFlickPower(): int
    {
        return $this->flickPower;
    }

    protected int $flickMaxPages = 1;

    public function flickMaxPages(int $flickMaxPages): static
    {
        $this->flickMaxPages = $flickMaxPages;

        return $this;
    }

    public function getFlickMaxPages(): int
    {
        return $this->flickMaxPages;
    }

    protected bool $waitForTransition = false;

    public function waitForTransition(bool $waitForTransition = true): static
    {
        $this->waitForTransition = $waitForTransition;

        return $this;
    }

    public function getWaitForTransition(): bool
    {
        return $this->waitForTransition;
    }

    protected ?string $arrowPath = null;

    public function arrowPath(string|null $arrowPath): static
    {
        $this->arrowPath = $arrowPath;

        return $this;
    }

    public function getArrowPath(): string|null
    {
        return $this->arrowPath;
    }

    protected bool|string $autoplay = false;

    public function autoplay(bool|string $autoplay = true): static
    {
        if (is_string($autoplay) && $autoplay !== 'pause') {
            throw new InvalidArgumentException('Autoplay must be a boolean or "pause"');
        }

        $this->autoplay = $autoplay;

        return $this;
    }

    public function getAutoplay(): bool|string
    {
        return $this->autoplay;
    }

    protected int $interval = 5000;

    public function interval(int $interval): static
    {
        $this->interval = $interval;

        return $this;
    }

    public function getInterval(): int
    {
        return $this->interval;
    }

    protected bool $pauseOnHover = true;

    public function pauseOnHover(bool $pauseOnHover): static
    {
        $this->pauseOnHover = $pauseOnHover;

        return $this;
    }

    public function getPauseOnHover(): bool
    {
        return $this->pauseOnHover;
    }

    protected bool $pauseOnFocus = true;

    public function pauseOnFocus(bool $pauseOnFocus): static
    {
        $this->pauseOnFocus = $pauseOnFocus;

        return $this;
    }

    public function getPauseOnFocus(): bool
    {
        return $this->pauseOnFocus;
    }

    protected bool $resetProgress = true;

    public function resetProgress(bool $resetProgress): static
    {
        $this->resetProgress = $resetProgress;

        return $this;
    }

    public function getResetProgress(): bool
    {
        return $this->resetProgress;
    }

    protected bool|string $lazyLoad = false;

    public function lazyLoad(bool|string $lazyLoad = true): static
    {
        if (is_string($lazyLoad) && !in_array($lazyLoad, ['nearby', 'sequential'])) {
            throw new InvalidArgumentException('Lazy load must be a boolean or "nearby/sequential"');
        }

        $this->lazyLoad = $lazyLoad;

        return $this;
    }

    public function getLazyLoad(): bool|string
    {
        return $this->lazyLoad;
    }

    protected int $preloadPages = 1;

    public function preloadPages(int $preloadPages): static
    {
        $this->preloadPages = $preloadPages;

        return $this;
    }

    public function getPreloadPages(): int
    {
        return $this->preloadPages;
    }

    protected bool|string $keyboard = true;

    public function keyboard(bool|string $keyboard): static
    {
        if (is_string($keyboard) && !in_array($keyboard, ['focused', 'global'])) {
            throw new InvalidArgumentException('Keyboard must be a boolean or "focused/global"');
        }

        $this->keyboard = $keyboard;

        return $this;
    }

    public function getKeyboard(): bool|string
    {
        return $this->keyboard;
    }

    protected bool $wheel = false;

    public function wheel(bool $wheel = true): static
    {
        $this->wheel = $wheel;

        return $this;
    }

    public function getWheel(): bool
    {
        return $this->wheel;
    }

    protected ?int $wheelStep = null;

    public function wheelStep(int|null $wheelStep): static
    {
        $this->wheelStep = $wheelStep;

        return $this;
    }

    public function getWheelStep(): int|null
    {
        return $this->wheelStep;
    }

    protected bool $releaseWheel = false;

    public function releaseWheel(bool $releaseWheel = true): static
    {
        $this->releaseWheel = $releaseWheel;

        return $this;
    }

    public function getReleaseWheel(): bool
    {
        return $this->releaseWheel;
    }

    protected CarouselDirection $direction = CarouselDirection::LTR;

    public function direction(CarouselDirection $direction): static
    {
        $this->direction = $direction;

        return $this;
    }

    public function getDirection(): CarouselDirection
    {
        return $this->direction;
    }

    protected bool $cover = false;

    public function cover(bool $cover = true): static
    {
        $this->cover = $cover;

        return $this;
    }

    public function getCover(): bool
    {
        return $this->cover;
    }

    protected ?bool $slideFocus = null;

    public function slideFocus(bool|null $slideFocus): static
    {
        $this->slideFocus = $slideFocus;

        return $this;
    }

    public function getSlideFocus(): bool|null
    {
        return $this->slideFocus;
    }

    protected ?string $focusableNodes = null;

    public function focusableNodes(string|null $focusableNodes): static
    {
        $this->focusableNodes = $focusableNodes;

        return $this;
    }

    public function getFocusableNodes(): string|null
    {
        return $this->focusableNodes;
    }

    protected bool $isNavigation = false;

    public function isNavigation(bool $isNavigation = true): static
    {
        $this->isNavigation = $isNavigation;

        return $this;
    }

    public function getIsNavigation(): bool
    {
        return $this->isNavigation;
    }

    protected bool|string $trimSpace = true;

    public function trimSpace(bool|string $trimSpace): static
    {
        if (is_string($trimSpace) && $trimSpace !== 'move') {
            throw new InvalidArgumentException('Trim space must be a boolean or "move"');
        }

        $this->trimSpace = $trimSpace;

        return $this;
    }

    public function getTrimSpace(): bool|string
    {
        return $this->trimSpace;
    }

    protected bool $omitEnd = false;

    public function omitEnd(bool $omitEnd = true): static
    {
        $this->omitEnd = $omitEnd;

        return $this;
    }

    public function getOmitEnd(): bool
    {
        return $this->omitEnd;
    }

    protected bool $updateOnMove = false;

    public function updateOnMove(bool $updateOnMove = true): static
    {
        $this->updateOnMove = $updateOnMove;

        return $this;
    }

    public function getUpdateOnMove(): bool
    {
        return $this->updateOnMove;
    }

    protected bool $destroy = false;

    public function destroy(bool $destroy = true): static
    {
        $this->destroy = $destroy;

        return $this;
    }

    public function getDestroy(): bool
    {
        return $this->destroy;
    }

    protected MediaQuery $mediaQuery = MediaQuery::MAX;

    public function mediaQuery(MediaQuery $mediaQuery): static
    {
        $this->mediaQuery = $mediaQuery;

        return $this;
    }

    public function getMediaQuery(): MediaQuery
    {
        return $this->mediaQuery;
    }

    protected bool $live = true;

    public function live(bool $live): static
    {
        $this->live = $live;

        return $this;
    }

    public function getLive(): bool
    {
        return $this->live;
    }

    /**
     * @var array<string|int, Options>|null
     */
    protected ?array $breakpoints = null;

    /**
     * @param array<string|int, Options>|null $breakpoints
     * @return $this
     */
    public function breakpoints(array|null $breakpoints): static
    {
        $this->breakpoints = $breakpoints;

        return $this;
    }

    /**
     * @return array<string|int, Options>|null
     */
    public function getBreakpoints(): array|null
    {
        return $this->breakpoints;
    }

    protected ?Options $reducedMotion = null;

    public function reducedMotion(Options|null $reducedMotion): static
    {
        $this->reducedMotion = $reducedMotion;

        return $this;
    }

    public function getReducedMotion(): Options|null
    {
        return $this->reducedMotion;
    }

    /**
     * @var array<string, string>|null $classes
     */
    protected ?array $classes = null;

    /**
     * @param array<string, string>|null $classes
     * @return $this
     */
    public function classes(array|null $classes): static
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * @return array<string, string>|null
     */
    public function getClasses(): array|null
    {
        return $this->classes;
    }

    protected ?i18n $i18n = null;

    public function i18n(i18n|null $i18n): static
    {
        $this->i18n = $i18n;

        return $this;
    }

    public function getI18n(): i18n|null
    {
        return $this->i18n;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);

        $publicMethods = $reflection->getMethods(ReflectionProperty::IS_PUBLIC);
        $methods = array_filter($publicMethods, fn ($method) => Str::startsWith($method->getName(), 'get'));

        $options = [];

        foreach ($methods as $method) {
            $getter = $method->getName();
            $name = Str::of($getter)->remove('get')->lcfirst()->toString();
            $value = $this->$getter();

            if ($value instanceof Arrayable) {
                $value = $value->toArray();
            }

            if ($value instanceof BackedEnum) {
                $value = $value->value;
            }

            if ($value !== null) {
                $options[$name] = $value;
            }
        }

        return $options;
    }
}
